<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Coding Challenge - Network connections</div>
                    <div class="card-body">
                        <div class="btn-group w-100 mb-3" role="group" aria-label="Basic radio toggle button group">
                            <button  class="btn btn-outline-primary" @click="actionType('suggestions')">Suggestions ({{suggestions.total}})</button>

                            <button  class="btn btn-outline-primary" @click="actionType('sent_requests')">Sent Requests ({{sent_requests.total}})</button>

                            <button  class="btn btn-outline-primary" @click="actionType('received_requests')">Received Requests({{received_requests.total}})</button>
                            <button class="btn btn-outline-primary" @click="actionType('connections')">Connections ({{connections.total}})</button>
                        </div>
                        <div class="my-2 shadow text-white bg-dark p-1">
                            <div v-for="(suggestion,key) in suggestions.data" class="d-flex justify-content-between mt-2">
                                <table class="ms-1">
                                    <td class="align-middle">{{suggestion.name}}</td>
                                    <td class="align-middle"> - </td>
                                    <td class="align-middle">{{suggestion.email}}</td>
                                    <td class="align-middle"></td>
                                </table>
                                <div>
                                    <button  id="accept_request_btn_" class="btn btn-primary me-1">Accept</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                suggestions:0,
                sent_requests:0,
                received_requests:0,
                connections:0,
                type:'suggestions',
                userData:JSON.parse(this.$props.user)
            }
        },
        mounted() {
        },
        computed:{

        },
        methods: {
          async  loadData(userId) {
            await axios.get("api/network-connections/"+userId)
                .then(({data}) => {
                    this.sent_requests = data.sent_requests;
                    this.received_requests = data.received_requests;
                    this.connections = data.connections;
                    this.suggestions = data.suggestions;
                })
                .catch(error=>{
                    console.log(error);
                })

            },
            actionType:(type) =>{
                console.log(type);
                // this.type = type;
            }
        },
        created() {
            this.loadData(this.userData.id);
        }
    }
</script>
