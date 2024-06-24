import Alpine from "alpinejs";
import Swal from "sweetalert2";
import axios from 'axios'

Alpine.data('MedicalFollowButtonData', function(){
    return {
        sent : false,

        load : false,



        send(el){

            let self = this

            if( el.dataset.patient == -1 ){
                window.location.href = '/workspace/login';
                return;
            }


            Swal.fire({
                title: "send medical request to a doctor",
                input: "text",
                inputAttributes: {
                  autocapitalize: "off"
                },
                showCancelButton: true,
                confirmButtonText: "send",
                showLoaderOnConfirm: true,
                preConfirm: async (note) => {
                  try {
                    const url = `
                      https://aisha.test/doctors/${el.dataset.doctor}/request
                    `;
                    const response = await axios.post(url, {
                        note : note
                    });
                    if (!(response.status == 200)) {
                      return Swal.showValidationMessage(`
                        ${JSON.stringify(await response.data)}
                      `);
                    }
                    return response.data;
                  } catch (error) {
                    Swal.showValidationMessage(`
                      Request failed: ${error}
                    `);
                  }
                },
                allowOutsideClick: () => !Swal.isLoading()
              }).then((result) => {
                if (result.isConfirmed) {
                  Swal.fire({
                    title: `wow`,
                  });
                }
              });


            
            

        }
    }
})