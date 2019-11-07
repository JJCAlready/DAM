import flask

import Mega.services.package_service as package_service
import Mega.services.user_service as user_service
from Mega.infrastructure.view_modifiers import response

blueprint = flask.Blueprint('home', __name__, template_folder='templates')


@blueprint.route('/')
@response(template_file='home/index.html')
def index():
    return {
        'releases': package_service.get_latest_releases(),
        'package_count': package_service.get_package_count(),
        'release_count': package_service.get_release_count(),
        'user_count': user_service.get_user_count(),
    }


@blueprint.route('/about')
@response(template_file='home/about.html')
def about():
    return {}