<template>
    <admin-layout 
        :userData="userData" 
        :rolName="userData.privileges == 'oadmin' ? 'Administrador' : 'Empleado'"
        :teamData="teamData"
        >
            <v-card elevation="8" class="mx-10 mt-5 px-5 py-10 radio">
            <h2>Listado de solicitudes</h2>
            <!-- <v-row justify="space-between" align="center">
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
            </v-row> -->
            <v-data-table
                :headers="headers"
                :items="items"
                :items-per-page="5"
                class="elavation-1 mt-5"
            >
            </v-data-table>
        </v-card>
    </admin-layout>
</template>

<script>
import AdminLayout from "../../../../Layouts/AdminLayout";

export default {
    props: {
        userData: Object,
        teamData: Object
    },
    components: {
        AdminLayout
    },
    data() {
        return {
            headers: [
                {
                    text: "Beneficiado",
                    align: "center",
                    sortable: true,
                    value: ""
                },
                {
                    text: "Cedula",
                    align: "center",
                    sortable: true,
                    value: ""
                },
                {
                    text: "Nacionalidad",
                    align: "center",
                    sortable: true,
                    value: ""
                },
                {
                    text: "Tipo de beneficio",
                    align: "center",
                    sortable: true,
                    value: ""
                },
                {
                    text: "Resumen",
                    align: "center",
                    sortable: true,
                    value: ""
                }
            ],
            items: []
        }
    },
    mounted: function() {
    },
    methods: {
    }
};
</script>