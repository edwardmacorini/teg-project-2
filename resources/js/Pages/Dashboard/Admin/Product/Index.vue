<template>
    <admin-layout 
        :userData="userData" 
        :rolName="userData.privileges == 'oadmin' ? 'Administrador' : 'Empleado'"
        :teamType="teamType"
        >
            
    </admin-layout>
</template>

<script>
import AdminLayout from "../../../../Layouts/AdminLayout";

export default {
    props: {
        userData: Object,
        teamType: Number
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
