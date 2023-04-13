/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
//on importe login.scss seulement si on sur la route app_login ou app_register
if (window.location.pathname === '/login' || window.location.pathname === '/register')
{
    import('./styles/login.scss');
}
// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';

require('bootstrap');

