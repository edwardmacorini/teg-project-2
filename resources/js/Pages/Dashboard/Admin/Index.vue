<template>
    <admin-layout
        :userData="userData"
        :rolName="
            userData.privileges == 'oadmin' ? 'Administrador' : 'Empleado'
        "
        :teamData="teamData"
    >
        <v-row justify="center mt-10">
            <v-col cols="6">
                <v-card elevation="8">
                    <v-card-text>
                        <v-row justify="center">
                            <v-col cols="auto">
                                <v-img
                                    src="/assets/logo.png"
                                    style="width: 200px;"
                                ></v-img>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col cols="12" class="text-center title black-text">
                                Bienvenido al sistema <br>{{ userData.privileges == 'oadmin' ? 'Administrador' : 'Empleado' }} <span class="text-capitalize">{{  userData.name  }}</span>
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </admin-layout>
</template>

<script>
import AdminLayout from "../../../Layouts/AdminLayout";

export default {
    props: {
        userData: Object,
        teamData: Object
    },
    components: {
        AdminLayout
    },
    data() {
        return {};
    },
    mounted: function() {},
    methods: {}
};
</script>
