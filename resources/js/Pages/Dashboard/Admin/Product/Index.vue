<template>
    <admin-layout
        :userData="userData"
        :rolName="
            userData.privileges == 'oadmin' ? 'Administrador' : 'Empleado'
        "
        :teamData="teamData"
    >
        <v-card elevation="8" class="mx-10 mt-5 px-5 py-10 radio">
            <h2>Listado de productos</h2>
            <v-row justify="space-between" align="center">
                <v-col cols="5">
                    <v-text-field
                        label="Buscar producto"
                        v-model="search"
                        append-icon="mdi-manigfy"
                        single-line
                        hide-details
                    ></v-text-field>
                </v-col>
                <v-col cols="auto">
                    <inertia-link
                        :href="route('admin-products-create')"
                        class="txnode"
                    >
                        <v-btn outlined color="blue darken-3" class="mr-5">
                            Nuevo producto
                        </v-btn>
                    </inertia-link>
                </v-col>
            </v-row>
            <v-data-table
                :headers="headers"
                :items="items"
                :items-per-page="5"
                class="elavation-1 mt-5"
            >
                <template v-slot:item.actions="{ item }">
                    <v-icon small class="mr-2" @click="editItem(item)">
                        mdi-pencil
                    </v-icon>
                    <v-icon small @click="deleteItem(item)">
                        mdi-delete
                    </v-icon>
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
        teamData: Object,
        products: Object
    },
    components: {
        AdminLayout
    },
    data() {
        return {
            headers: [
                {
                    text: "Nombre",
                    align: "center",
                    sortable: true,
                    value: "name"
                },
                {
                    text: "Unidad",
                    align: "center",
                    sortable: true,
                    value: "unit"
                },
                {
                    text: "Descripción",
                    align: "center",
                    sortable: true,
                    value: "descripcion"
                },
                {
                    text: "Acción",
                    align: "center",
                    sortable: true,
                    value: "actions"
                }
            ],
            items: []
        };
    },
    mounted: function() {
        this.products.forEach(element => {
            this.items.push({
                name: element.name,
                unit: element.unit.trim(),
                descripcion: element.descripcion
            });
        });
    },
    methods: {}
};
</script>
