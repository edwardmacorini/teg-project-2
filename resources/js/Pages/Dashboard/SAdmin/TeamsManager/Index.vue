<template>
    <admin-layout :userData="userData" rolName="Super Administrador">
        <v-card elevation="8" class="mx-10 mt-5 px-5 py-10 radio">
            <h2>Listado de organizaciones</h2>
            <v-row justify="space-between" align="center">
                <v-col cols="5">
                    <v-text-field
                        label="Buscar organización o usuario"
                        v-model="search"
                        append-icon="mdi-manigfy"
                        single-line
                        hide-details
                    ></v-text-field>
                </v-col>
                <v-col cols="auto">
                    <inertia-link
                        :href="route('sadmin.orgs.create')"
                        class="txnode"
                    >
                        <v-btn outlined color="blue darken-3" class="mr-5">
                            Nueva organización
                        </v-btn>
                    </inertia-link>
                </v-col>
            </v-row>
            <v-data-table
                :headers="headers"
                :items="items"
                :search="search"
                :items-per-page="5"
                class="elavation-1 mt-5"
            >
                <template v-slot:item.name="{ item }">
                    <span class="text-uppercase">{{ item.name }}</span>
                </template>
                <template v-slot:item.rif="{ item }">
                    <span class="text-uppercase">J-{{ item.rif }}</span>
                </template>
                <template v-slot:item.username="{ item }">
                    <span class="text-uppercase">{{ item.username }}</span>
                </template>
                <template v-slot:item.type="{ item }">
                    <span v-if="item.type">Organización</span>
                    <span v-else>Farmacia</span>
                </template>
                <template v-slot:no-data>
                    No poseé ninguna organización disponible
                </template>
            </v-data-table>
        </v-card>
    </admin-layout>
</template>

<script>
import AdminLayout from "../../../../Layouts/AdminLayout";

export default {
    props: {
        userData: Object,
        teams: Array,
        userList: Array
    },
    components: {
        AdminLayout
    },
    data() {
        return {
            search: "",
            headers: [
                {
                    text: "Nombre de la institución",
                    align: "center",
                    sortable: true,
                    value: "name"
                },
                {
                    text: "RIF",
                    align: "center",
                    sortable: true,
                    value: "rif"
                },
                {
                    text: "Tipo",
                    align: "center",
                    sortable: true,
                    value: "type"
                },
                {
                    text: "Usuario",
                    align: "center",
                    sortable: true,
                    value: "username"
                }
            ],
            items: []
        };
    },
    // created: function() {
    //     this.getUsers();
    // },
    mounted: function() {
        this.teams.forEach(element => {
            this.items.push({
                name: element.name,
                rif: element.rif,
                type: element.type,
                username: this.conUser(element.id)
            });
        });
    },
    methods: {
        // getUsers() {
        //     var self = this;
        //     axios.get('/api/users/all/oadmin')
        //         .then(function(response) {
        //             console.log(response.data);
        //             self.usersList = response.data
        //         })
        // },
        conUser(id) {
            var value;
            this.userList.forEach(element => {
                if (element.privileges == "oadmin") {
                    if (element.team_id == id) {
                        value = element.username;
                    }
                }
            });
            return value;
        }
    }
};
</script>
