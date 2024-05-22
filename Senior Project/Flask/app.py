# Mohamad Al-Nakib

import os
import re
import sys
import argparse
import json

from pathlib import Path
from flask import (
    Flask,
    render_template,
    Response,
    request,
    send_from_directory,
    redirect,
    url_for,
)
from ultralytics import YOLO
from ultralytics.utils.checks import cv2, print_args
from utils.general import (
    update_options
)

# Initialize paths
FILE = Path(__file__).resolve()
ROOT = FILE.parents[0]
if str(ROOT) not in sys.path:
    sys.path.append(str(ROOT))
ROOT = Path(os.path.relpath(ROOT, Path.cwd()))

# Initialize Flask API
app = Flask(__name__)

def title_case(text):
    return text[0].upper() + text[1:].lower()


def get_latest_exp_number(directory):
    if not os.path.exists(directory):
        return None
    exp_numbers = []
    for folder in os.listdir(directory):
        try:
            exp_number = int(folder.split("exp")[-1])
            exp_numbers.append(exp_number)
        except ValueError:
            pass
    if not exp_numbers:
        return None

    return max(exp_numbers)


def get_first_number(filepath):

    try:
        with open(filepath, "r") as f:
            line = f.readline()
            match = re.search(r"\d+", line)
            if match:
                return int(match.group())
            else:
                return None
    except FileNotFoundError:
        print(f"Error: File not found - {filepath}")
    except Exception as e:
        print(f"Error processing file {filepath}: {e}")
    return None


def check_and_duplicate(data):
    new_data = []
    i = 0
    while i < len(data):
        if i + 4 < len(data) and all(data[i] == value for value in data[i + 1 : i + 5]):
            new_data.extend([data[i]] * 4)
            i += min(i + 9, len(data))
        else:
            new_data.append(data[i])
            i += 1
    return new_data


def saveFilesMapClasses():
    name_map = {0: 'Eight', 1: 'Four', 2: 'Good morning', 3: 'Hello', 4: 'I', 5: 'I Love You', 6: 'Nine', 7: 'No', 8: 'One', 9: 'Seven', 10: 'Six', 11: 'Thank You', 12: 'Three', 13: 'Two', 14: 'Yes', 15: 'dog', 16: 'done', 17: 'help', 18: 'how are you', 19: 'like', 20: 'name', 21: 'nice to meet you', 22: 'o-clock', 23: 'sign language', 24: 'this', 25: 'video', 26: 'website', 27: 'welcome'}
    names = []

    tmp = "runs/detect"
    latest_exp_number = get_latest_exp_number(tmp)
    directory = tmp + "/exp" + str(latest_exp_number) + "/labels"
    for filename in os.listdir(directory):
        if filename.endswith(".txt"):
            filepath = os.path.join(directory, filename)
            first_number = get_first_number(filepath)
            if first_number:
                name = name_map.get(first_number)
                if name:
                    print(f"File: {filename}, Name: {name}")
                else:
                    print(
                        f"File: {filename}, ID: {first_number} (Name not found in mapping)"
                    )
                names.append(name_map.get(first_number))
    new_data = check_and_duplicate(names)
    print(set(new_data))
    unique_names = list(set(new_data))
    output_file = "transcript.txt"
    with open(output_file, "w") as f:
        for name in unique_names:
            f.write(f"{name}\n")


def predict(opt):
    results = model(**vars(opt), stream=True)
    results_folder = Path(opt.project) / opt.name / "results"
    results_folder.mkdir(parents=True, exist_ok=True)

    for result in results:
        if opt.save_txt:
            result_json = json.loads(result.tojson())
            yield json.dumps({"results": result_json})

        # Save image with detection results
        else:
            im0 = cv2.imencode(".jpg", result.plot())[1].tobytes()
            filename = os.path.splitext(os.path.basename(result.path))[0]
            image_path = results_folder / f"{filename}_det.jpg"
            with open(image_path, "wb") as f:
                f.write(im0)
            yield (b"--frame\r\n" b"Content-Type: image/jpeg\r\n\r\n" + im0 + b"\r\n")


# Upload page route
@app.route("/")
def upload_page():
    return render_template("uploadPage.php")


# Result page route
@app.route("/results")
def results_page():
    saveFilesMapClasses()
    results_folder = Path(opt.project) / opt.name / "results"
    images = [str(image) for image in results_folder.glob("*.jpg")]
    unique_names_path = Path(
        r"D:\SeniorProject Final Version\Flask\transcript.txt"
    )
    if unique_names_path.exists():
        with open(unique_names_path, "r") as file:
            unique_names_content = file.read()
    else:
        unique_names_content = "File Not Found."

    unique_names_content = title_case(unique_names_content)
    return render_template(
        "resultsPage.php", images=images, unique_names=unique_names_content
    )


# Prediction route
@app.route("/predict", methods=["GET", "POST"])
def video_feed():
    if request.method == "POST":
        uploaded_file = request.files.get("myfile")
        save_txt = request.form.get("save", "T")

        if uploaded_file:
            source = Path(__file__).parent / raw_data / uploaded_file.filename
            uploaded_file.save(source)
            opt.source = source
        else:
            opt.source, opt.save_txt = update_options(request)

        opt.save_txt = True if save_txt == "T" else False

    elif request.method == "GET":
        opt.source, opt.save_txt = update_options(request)
    for _ in predict(opt):
        pass

    return redirect(url_for("results_page"))


# Main function
if __name__ == "__main__":
    # Input arguments
    parser = argparse.ArgumentParser()
    parser.add_argument(
        "--model",
        "--weights",
        type=str,
        default=ROOT / "SignModel.pt",
        help="model path or triton URL",
    )
    parser.add_argument(
        "--source",
        type=str,
        default=ROOT / "data/images",
        help="source directory for images or videos",
    )
    parser.add_argument(
        "--conf",
        "--conf-thres",
        type=float,
        default=0.25,
        help="object confidence threshold for detection",
    )
    parser.add_argument(
        "--iou",
        "--iou-thres",
        type=float,
        default=0.7,
        help="intersection over union (IoU) threshold for NMS",
    )
    parser.add_argument(
        "--imgsz",
        "--img",
        "--img-size",
        nargs="+",
        type=int,
        default=[640],
        help="image size as scalar or (h, w) list, i.e. (640, 480)",
    )
    parser.add_argument("--half", action="store_true", help="use half precision (FP16)")
    parser.add_argument(
        "--device",
        default="",
        help="device to run on, i.e. cuda device=0/1/2/3 or device=cpu",
    )
    parser.add_argument(
        "--show",
        "--view-img",
        default=False,
        action="store_true",
        help="show results if possible",
    )
    parser.add_argument("--save", action="store_true", help="save images with results")
    parser.add_argument(
        "--save_txt",
        "--save-txt",
        action="store_true",
        default=True,
        help="save results as .txt file",
    )
    parser.add_argument(
        "--save_conf",
        "--save-conf",
        action="store_true",
        help="save results with confidence scores",
    )
    parser.add_argument(
        "--save_crop",
        "--save-crop",
        action="store_true",
        help="save cropped images with results",
    )
    parser.add_argument(
        "--show_labels",
        "--show-labels",
        default=True,
        action="store_true",
        help="show labels",
    )
    parser.add_argument(
        "--show_conf",
        "--show-conf",
        default=True,
        action="store_true",
        help="show confidence scores",
    )
    parser.add_argument(
        "--max_det",
        "--max-det",
        type=int,
        default=300,
        help="maximum number of detections per image",
    )
    parser.add_argument(
        "--vid_stride",
        "--vid-stride",
        type=int,
        default=1,
        help="video frame-rate stride",
    )
    parser.add_argument(
        "--stream_buffer",
        "--stream-buffer",
        default=False,
        action="store_true",
        help="buffer all streaming frames (True) or return the most recent frame (False)",
    )
    parser.add_argument(
        "--line_width",
        "--line-thickness",
        default=None,
        type=int,
        help="The line width of the bounding boxes. If None, it is scaled to the image size.",
    )
    parser.add_argument(
        "--visualize",
        default=False,
        action="store_true",
        help="visualize model features",
    )
    parser.add_argument(
        "--augment",
        default=False,
        action="store_true",
        help="apply image augmentation to prediction sources",
    )
    parser.add_argument(
        "--agnostic_nms",
        "--agnostic-nms",
        default=False,
        action="store_true",
        help="class-agnostic NMS",
    )
    parser.add_argument(
        "--retina_masks",
        "--retina-masks",
        default=False,
        action="store_true",
        help="whether to plot masks in native resolution",
    )
    parser.add_argument(
        "--classes",
        type=list,
        help="filter results by class, i.e. classes=0, or classes=[0,2,3]",
    )  # 'filter by class: --classes 0, or --classes 0 2 3')
    parser.add_argument(
        "--boxes",
        default=True,
        action="store_false",
        help="Show boxes in segmentation predictions",
    )
    parser.add_argument(
        "--exist_ok",
        "--exist-ok",
        action="store_true",
        help="existing project/name ok, do not increment",
    )
    parser.add_argument(
        "--project", default=ROOT / "runs/detect", help="save results to project/name"
    )
    parser.add_argument("--name", default="exp", help="save results to project/name")
    parser.add_argument(
        "--dnn", action="store_true", help="use OpenCV DNN for ONNX inference"
    )
    parser.add_argument(
        "--raw_data",
        "--raw-data",
        default=ROOT / "data/raw",
        help="save raw images to data/raw",
    )
    parser.add_argument("--port", default=5000, type=int, help="port deployment")
    opt, unknown = parser.parse_known_args()

    print_args(vars(opt))
    port = opt.port
    delattr(opt, "port")
    raw_data = Path(opt.raw_data)
    raw_data.mkdir(parents=True, exist_ok=True)
    delattr(opt, "raw_data")
    model = YOLO(str(opt.model))
    app.run(host="0.0.0.0", port=port, debug=False)
