import Alpine from "alpinejs";
import Swal from "sweetalert2";
import { driver } from "driver.js";
import 'driver.js/dist/driver.css'


const driverObj = driver({
    showProgress : true,
    allowClose : true,

    steps : []
})

window.onload = function(){
    driverObj.drive()
}

