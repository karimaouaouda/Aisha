import Alpine from "alpinejs";
import Swal from "sweetalert2";
import axios from 'axios'
import configs from '../config/config'

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
                title: "send medical request to a doctor, tell him why he should accept you",
                input: "text",
                inputAttributes: {
                  autocapitalize: "off"
                },
                showCancelButton: true,
                confirmButtonText: "request now",
                showLoaderOnConfirm: true,
                preConfirm: async (note) => {
                  try {
                    const url = `
                      ${configs.base_url}/doctors/${el.dataset.doctor}/request
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
                    icon : 'success',
                    title: `request has been sent`,
                    text : 'the request sent successfully, we will notify you when doctor respond to your request'
                  });

                  setTimeout(function(){
                    window.location.reload()
                  }, 1500)
                }
              }).catch(err => {
                Swal.fire({
                  icon : 'error',
                  title: `request not sent`,
                  text : err
                });
              })
        }
    }
})

Alpine.start()