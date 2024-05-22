# SnapAI
Snap AI is a revolutionary web application designed to bridge communication gaps by translating American Sign Language (ASL) into text. Leveraging advanced AI-powered models, Snap AI allows users to upload photos or videos of ASL gestures, which are then accurately converted into readable script.
# Key Features 

ASL to Text Translation: Effortlessly translate American Sign Language from images and videos into written text.
AI-Powered Accuracy: Utilizes cutting-edge AI models for precise and reliable translations.
User-Friendly Interface: Simple and intuitive design for easy navigation and use.
Supports Multiple Formats: Accepts both photo and video uploads for versatile input options.

# Technical Details 

Custom Dataset: We developed our own dataset specifically tailored for ASL recognition.
YOLOv8 Algorithm: Employed the YOLOv8 algorithm for state-of-the-art object detection and recognition.
Flask API: Built on a Flask API to ensure seamless and efficient backend processing.
Getting Started

# Clone the Repository:

git clone https://github.com/revech/snapai.git

# Install Dependencies:

cd snapai
pip install -r requirements.txt

 - Flask for the web application
Flask==2.1.1

 - Gunicorn for running the Flask application in a production environment
gunicorn==20.1.0

 - Flask-CORS for handling Cross-Origin Resource Sharing (CORS)
Flask-CORS==3.0.10

 -  TensorFlow and PyTorch for the AI model 
tensorflow==2.9.1
torch==1.12.0
torchvision==0.13.0
 - !pip install roboflow
 -  YOLOv8 dependencies (if not included in the above frameworks)
 -  For PyTorch-based YOLO implementation
opencv-python==4.5.5.64
 -  If YOLOv8 requires additional specific dependencies, add them here

 -  NumPy for numerical operations
numpy==1.21.6

 -  Pandas for data handling
pandas==1.3.5

 -  Scikit-learn for additional machine learning utilities
scikit-learn==1.0.2

 - Pillow for image processing
Pillow==9.1.1

 -  Requests for making HTTP requests (if needed for external API calls)
requests==2.27.1

 -  Additional utilities
matplotlib==3.5.2
seaborn==0.11.2


# Run the Application:

flask run

# How It Works: 

Upload: Users can upload a photo or video containing ASL gestures.
Processing: The uploaded file is processed using our custom dataset and the YOLOv8 algorithm.
Translation: The recognized gestures are translated into text using our AI model.
Output: The translated text is displayed on the web interface.
Experience seamless communication with Snap AI, making ASL more accessible and understandable for everyone. Join us in breaking down language barriers and enhancing connectivity through technology.

Explore the repository to learn more about our project and contribute to its development!






