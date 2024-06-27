import Alpine from "alpinejs";
import Swal from "sweetalert2";


const driverObj = driver({
    showProgress : true,
    allowClose : true,

    steps : []
})

window.onload = function(){
    driverObj.drive()
}

