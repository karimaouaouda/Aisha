import Alpine from "alpinejs";
import axios from 'axios';
import Swal from "sweetalert2";

const base_url = 'https://aisha.test'

Alpine.data('appData', function(){

    return {
        async alertPatient($el){
            const patient = $el.dataset.patient
            const topic = $el.dataset.topic

            //alert patient from topic with a text

            const { value: formValues } = await Swal.fire({
                title: "Multiple inputs",
                html: `
                  <input id="swal-input1" placeholder="what you alert from" class="swal2-input">
                  <input id="swal-input2" placeholder="message..." class="swal2-input">
                `,
                focusConfirm: false,
                preConfirm: () => {
                  return [
                    document.getElementById("swal-input1").value,
                    document.getElementById("swal-input2").value
                  ];
                }
              });
              if (formValues) {
                let formData = new FormData

                formData.append('alert_subject', formValues[0])
                formData.append('alert_content', formValues[1])
                formData.append('_token', document.querySelector('meta[name=csrf-token]').content)
                formData.append('topic', topic)

                axios.post(`${base_url}/${patient}/alert`, formData)
                    .then(response => {
                        if( response.data.status == 'success' ){
                            Swal.fire({
                                icon : 'success',
                                title : 'successfull alerted',
                                text: 'the alert is successfull published',
                                timer : 2500
                            })
                        }else{
                            Swal.fire({
                                icon : 'error',
                                title : 'not alerted',
                                text: response.data.message,
                                timer : 2500
                            })
                        }
                    }).catch(err => {
                        Swal.fire({
                            icon : 'error',
                            title : 'error was occured',
                            text : err
                        })
                    })
              }
        }
    }
})

Alpine.start();