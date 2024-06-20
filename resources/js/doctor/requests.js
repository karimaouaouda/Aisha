import Alpine from "alpinejs";
import axios from "axios";
import Swal from "sweetalert2";

const base_url = "https://chatpy.test" //import.env.VITE_BASE_URL

Alpine.data('AppData', function () {

    return {

        acceptRequest($el) {

            let patient_id = $el.dataset.patient

            let data = new FormData

            axios.post(base_url + `/following-requests/${patient_id}/accept`)
                .then(function (response) {
                    if (response.data.status == 'failed') {
                        Swal.fire({
                            icon: 'error',
                            title: 'failed to accept request',
                            text: response.data.message
                        })
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'request accepted successfully',
                            timer: 2500
                        })
                    }
                }).catch(err => {
                Swal.fire({
                    icon: 'error',
                    title: 'error was occured',
                    text: err
                })
            })
        },

        rejectRequest($el) {

            let patient_id = $el.dataset.patient

            Swal.fire({
                title: "reject request",
                input: "text",
                inputAttributes: {
                    autocapitalize: "off"
                },
                showCancelButton: true,
                confirmButtonText: "reject",
                showLoaderOnConfirm: true,
                preConfirm: async (reason) => {
                    try {
                        const url = base_url + `/following-requests/${patient_id}/reject`;
                        const response = await axios.post(url, {
                            reason: reason
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
                        icon: 'success',
                        title: 'successfully rejected',
                        timer: 2500
                    });
                }
            });



        }

    }

})

Alpine.start()
