<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Map</div>
                
                <div class="card-body">
                   

                    <iframe
                      width="100%"
                      frameborder="0" style="border:0"
                      :src='map' allowfullscreen>
                    </iframe>

                    <input v-model="city" type="text" name="map" placeholder="City">
                    <input v-model="country" type="text" name="map" placeholder="Contry">    
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                location: {},
                city: '',
                country: '',
                coor: '',
                map: '', //https://www.google.com/maps/embed/v1/place?key=AIzaSyD6Vgegfh0ckuIZf8hUHyaOpatAH_YFwSM&q=Eiffel+Tower,'..'+France',
                key: 'AIzaSyD6Vgegfh0ckuIZf8hUHyaOpatAH_YFwSM',
            }
        },

        watch: {
            location: function() {
                this.map = "https://www.google.com/maps/embed/v1/place?key="+ this.key +"&q="+ this.coor
                console.log(this.map)
                console.log(this.location.country)
            },

            city: function() {
                this.coor = this.city+"+"+this.country
                this.map = "https://www.google.com/maps/embed/v1/place?key="+ this.key +"&q="+ this.coor
            },

            country: function() {
                this.coor = this.city+"+"+this.country
                this.map = "https://www.google.com/maps/embed/v1/place?key="+ this.key +"&q="+ this.coor
            },
        },

        created() {
            axios.get('/getlocation')
                .then( response => {
                    this.location = response.data
                    this.country = response.data.country
                    this.city = response.data.city
                    this.coor = this.city+"+"+this.country

                    console.log( response )
                })
        },
    }
</script>