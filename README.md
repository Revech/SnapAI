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

# Run the Application:

flask run

# How It Works: 

Upload: Users can upload a photo or video containing ASL gestures.
Processing: The uploaded file is processed using our custom dataset and the YOLOv8 algorithm.
Translation: The recognized gestures are translated into text using our AI model.
Output: The translated text is displayed on the web interface.
Experience seamless communication with Snap AI, making ASL more accessible and understandable for everyone. Join us in breaking down language barriers and enhancing connectivity through technology.

Explore the repository to learn more about our project and contribute to its development!






