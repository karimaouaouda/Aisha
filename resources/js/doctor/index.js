import Alpine from "alpinejs";
import Swal from "sweetalert2";
import axios from 'axios'
import configs from "../config/config";

Alpine.data('selectMultipleData', function(){
    return {
        openMenu : false,

        available :  [],

        selected : [] ,

        async loadCategories(){
            let self = this;
            axios.get(`${configs.base_url}/api/categories`)
                .then(function(res){
                    self.available.push(...res.data.categories)
                    console.log(res.data.categories)
                }).catch(err => {
                    Swal.fire({
                        icon : 'error',
                        title : 'error to get categories',
                        text : 'please refresh page or contact admin'
                    })
                })
        },

        select(val){
            if( this.available.includes(val) ){
                if( this.selected.includes(val) ){

                    this.selected.splice(
                        this.selected.indexOf(val),
                        1
                    )

                }else{
                    
                    this.selected.push(val)

                }
            }else{
                Swal.fire({
                    icon : 'error',
                    text : 'trying to add a non avalaible category',
                    title : 'unexpected scenario'
                })
            }
        }
    }
})


Alpine.data('searchPageData', function(){
    return {
        searching : false,
        
        showFilters : false,
        
        text : 'loading your doctors, please wait',

        filters : {
            categories : []
        },

        searchItems : [],

        loadAll(){
            let self = this

            axios.get(
                `${configs.base_url}/api/doctors?filter=0&all`
            ).then(res => {
                self.searchItems.push( ...res.data.doctors )
            })

        },

        search(query){

            let self = this;

            if( typeof(query) != 'string' ){
                return Swal.fire({
                    icon : 'error',
                    title : 'unexpected type of query',
                    text : 'please refresh page and search again'
                })
            }

            if( query.trim() == '' && this.filters.categories.length == 0 ){
                return Swal.fire({
                    icon : 'warning',
                    title : 'empty query',
                    text : 'tap something or chose category to search'
                })
            }
            let isFiltered = this.filters.categories.length > 0;
            let q = `${query.length > 0 ? 'query=' + query + '&' : '' }`
            if(isFiltered){
                q += 'filter=1';
                for(let category of this.filters.categories){
                    q += `&categories[]=${category}`
                }
            }else{
                q += 'filter=0'
            }

            window.location.href = `${configs.base_url}/doctors?${q}`
            /* axios.get(
                `${configs.base_url}/api/doctors?${q}`
            ).then(function(res){
                self.searching = false
                self.searchItems = res.data.doctors
            }).catch(err => {
                Swal.fire({
                    icon : 'error',
                    title : 'error in fetching doctors',
                    text : 'try to reload the page and reseearch again'
                })
            }) */

        }
    }
})

Alpine.start()