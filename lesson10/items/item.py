from flask import Flask
from flask_restful import Resource, Api

app = Flask(__name__)
api = Api(app)

class Items(Resource):
    def get(self):
        return {
            'items': ["Coffee", "Bananas", "Tomato", "Candys", "Ice Cream"]
        }

api.add_resource(Items, '/')

if __name__ == "__main__":
    app.run(host='0.0.0.0', port=80, debug=True)
