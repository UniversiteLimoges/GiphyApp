<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tags List</div>
                
                <div class="card-body">

                    <div class="tag-container">
                        <button  v-for="tag in tags" :key="tag.id" class="tag-button-unselect">
                            # {{ tag.name }}
                        </button>
                    </div> 

                    <button class="btn btn-blue" @click="getTags" type="submit">Get Tags</button>
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
				tags: []
			}
		}, 

		methods: {
			getTags(){
				axios.get('/tagslist')
					.then( response => {
						this.tags = response.data.tags
						console.log(response)
					});
			}
		}
	};
</script>
<style scoped>
    .tag-container {
        display: flex;
        flex-direction: column;
    }
</style>