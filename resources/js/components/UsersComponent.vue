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
                        <th width="50%">Email</th>
                    </tr>

                    <tr v-for="user in users" :key="user.id">
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                    </tr>
                </table>

                    <button class="btn btn-blue" @click="getUsers" type="submit">Get User</button>
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
                users: []
            }
        },

        methods: {
            getUsers(){
                axios.get('/userslist')
                    .then( response => {
                        this.users = response.data.users
                        console.log(response)
                        console.log(response.data.users)
                    })
            }
        },
    };
</script>

<style>
  .btn {
    @apply font-bold py-2 px-4 rounded-full;
  }
  .btn-blue {
    @apply bg-blue-500 text-white;
  }
  .btn-blue:hover {
    @apply bg-blue-700 text-white;
  }
</style>