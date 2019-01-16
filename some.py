from flask import Flask
from flask import send_file
app = Flask(__name__)

@app.route('/download')
def downloadFile ():
    #For windows you need to use drive name [ex: F:/Example.pdf]
    path = "/Users/otgonjargal/Desktop/Minton_v3.3"
    return send_file(path, as_attachment=True)

if __name__ == '__main__':
    app.run(port=27017,debug=True) 
