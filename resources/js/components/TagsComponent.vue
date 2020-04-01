<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">User List</div>
                
                <div class="card-body">

                <table>

                    <tr>

                        <th width="50%">Name</th>
                        <th width="50%">Type</th>
                    </tr>

                    <tr v-for="tag in tags" :key="tag.id">
                        <td>{{ tag.name }}</td>
                        <td>{{ tag.type }}</td>
                    </tr>
                </table>

                    <button @click="getTags" type="submit">Get Tags</button>
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
	}
</script>