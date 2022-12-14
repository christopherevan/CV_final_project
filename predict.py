import sys
from keras.models import load_model
from PIL import Image
import numpy as np
from skimage import transform

url = sys.argv[1]
dict = {0: 'Ballet Flat',
1: 'Boat',
2: 'Brogue',
3: 'Clog',
4: 'Sneaker'}

model = load_model('eff_b0_shoe.h5')

def load(filename):
   np_image = Image.open(filename)
   np_image = np.array(np_image).astype('float32')
   np_image = transform.resize(np_image, (224, 224, 3))
   np_image = np.expand_dims(np_image, axis=0)
   return np_image

image = load(url)
y_pred = model.predict(image)
y_class = [np.argmax(element) for element in y_pred]
print(dict[y_class[0]])
