import os
import json

data={}

for f in os.listdir("."):
    if f !="getdata.py" and f !="data.json" and f!= "img.html" and f!="jquery2.2.4.min.js":
        print(f)
        lst=[]
        
        for i in os.listdir(r".\\"+f):
            if i[-3:]=="jpg" or i[-3:]=="png":
                lst.append(i)

        data[f]=lst

#write data to json


        

with open("data.json","w") as f:
    f.write(json.dumps(data))
    
    


