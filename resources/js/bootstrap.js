import { popper } from '@popperjs/core';
import axios from 'axios';
import $ from 'jquery'
import jQuery from 'jquery';

window.jQuery = jQuery;
import('bootstrap');

import Swal from 'sweetalert2';

window.Popper = popper;
window.$ = $;
window.Swal = Swal;
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

