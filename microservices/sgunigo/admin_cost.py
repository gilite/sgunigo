import os
from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy 
from flask_cors import CORS
from os import environ

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = environ.get('dbURL') or 'mysql+mysqlconnector://root:root@localhost:8889/payment'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
 
db = SQLAlchemy(app)

CORS(app)

class payment_log(db.Model):
    __tablename__ = 'admin_cost'
 
    university = db.Column(db.String(4), primary_key=True)
    cost = db.Column(db.String(10), nullable=False)
    

    def json(self):
        return {
            "university": self.university, 
            "cost": self.cost
            }

@app.route("/admin_cost")
def get_all():
    admin_cost_list = payment_log.query.all()
    if len(admin_cost_list):
        return jsonify(
            {
                "code": 200,
                "data": {
                    "admin_cost": [admin_cost.json() for admin_cost in admin_cost_list]
                }
            }
        )
    return jsonify(
        {
            "code": 404,
            "message": "There are no Admin cost."
        }
    ), 404

 
@app.route("/admin_cost/<string:university>")
def find_by_payment_id(university):
    university_cost = payment_log.query.filter_by(university=university).first()
    if university_cost:
        return jsonify(
            {
                "code": 200,
                "data": university_cost.json()
            }
        )
    return jsonify(
        {
            "code": 404,
            "message": "University not found."
        }
    ), 404


if __name__ == '__main__':
    app.run(host='0.0.0.0',port=5200, debug=True)