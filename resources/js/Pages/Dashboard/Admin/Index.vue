<template>
    <admin-layout 
        :userData="userData" 
        :rolName="userData.privileges == 'oadmin' ? 'Administrador' : 'Empleado'"
        :teamData="teamData"
        >
            <div>No tengo nada</div>
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
        return {
        }
    },
    mounted: function() {
    },
    methods: {
    }
};
</script>