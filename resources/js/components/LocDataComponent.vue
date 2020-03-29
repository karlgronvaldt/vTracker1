<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-header">
                        <h5>
                            Hjælp os og vælg din nuværende status / Help us by setting your current status
                        </h5>
                    </div>

                    <div class="card-body">
                        <form action="data" method="post" @submit="checkForm">
                            <input name="lat" v-model="lat"><!-- readonly -->
                            <input name="long" v-model="long"><!-- readonly -->

                            <br>

                            <label for="smittekode">Jeg er pt. / I'm currently:</label>
                            <br>
                            <select v-model="selectedOptions" name="code">
                                <option v-for="option in options" v-bind:value="option.value">
                                    {{ option.text }}
                                </option>
                            </select>

                            <br>

                            <label for="smittekode">Køn:</label>
                            <br>
                            <select v-model="selectedGender" name="gender">
                                <option v-for="gender in genders" v-bind:value="gender.value">
                                    {{ gender.text }}
                                </option>
                            </select>

                            <input type="hidden" name="_token" :value="csrf">

                            <br><br>

                            <button class="btn btn-outline-dark" type="submit">Send</button>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        Data is automatically deleted after 2 weeks.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            navigator.geolocation.getCurrentPosition(this.position);
        },
        data: function() {
            return {
                lat: null,
                long: null,
                selectedOptions: '1',
                selectedGender: '1',
                options: [
                    { text: 'Rask / Healthy', value: 1 },
                    { text: 'COVID-19 smittet / Has COVID-19', value: 2 },
                    { text: 'I andet sygdomsforløb / Other illness', value: 3 }
                ],
                genders: [
                    { text: 'Mand / Male', value: 1 },
                    { text: 'Kvinde / Woman', value: 2 }
                ],
                csrf: document.head.querySelector('meta[name="csrf-token"]').content
            }
        },
        methods: {
            position: function(pos) {
                this.lat = pos.coords.latitude;
                this.long = pos.coords.longitude;
            },
            checkForm: function(e) {
                if (this.lat && this.long)
                    return true;

                e.preventDefault();
            }
        }
    }
</script>

<style type="text/css">
    select {
         margin-bottom: 1.5em;
    }

    input {
        visibility: hidden;
    }
</style>
