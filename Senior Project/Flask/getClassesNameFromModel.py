# Mohamad Al-Nakib 

from ultralytics import YOLO

# Load a model
model = YOLO('best.pt') 

class_names = model.names 
print(model.names) 

class_dict = {}
for idx, name in enumerate(class_names):
  class_dict[idx] = name

print(class_dict)
