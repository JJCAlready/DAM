import os
import sys

import flask

import Mega.data.db_session as db_session

folder = os.path.abspath(os.path.join(os.path.dirname(__file__), '..'))
sys.path.insert(0, folder)

app = flask.Flask(__name__)


def main():
    register_blueprints()
    setup_db()
    app.run(debug=True)


def setup_db():
    db_file = os.path.join(
        os.path.dirname(__file__),
        'db',
        'mega.sqlite')

    db_session.global_init(db_file)


def register_blueprints():
    from Mega.views import home_views
    from Mega.views import package_views
    from Mega.views import cms_views
    from Mega.views import account_views

    app.register_blueprint(package_views.blueprint)
    app.register_blueprint(home_views.blueprint)
    app.register_blueprint(account_views.blueprint)
    app.register_blueprint(cms_views.blueprint)


if __name__ == '__main__':
    main()
