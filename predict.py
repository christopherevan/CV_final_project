import sys
from tensorflow.keras.models import load_model

url = sys.argv[1]

model = load_model('eff_b0_shoe.h5')
y_pred = model.predict(url)

print(y_pred)
