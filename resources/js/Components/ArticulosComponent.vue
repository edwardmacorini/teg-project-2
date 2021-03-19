<template>
    <v-card :loading="loading" class="mx-auto my-12" max-width="300">
        <template slot="progress">
            <v-progress-linear
                color="deep-purple"
                height="10"
                indeterminate
            ></v-progress-linear>
        </template>

        <v-img
            height="250"
            src="https://images.unsplash.com/photo-1601055283742-8b27e81b5553?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
        ></v-img>

        <v-card-title>Cafe Badilico</v-card-title>

        <v-card-text>
            <v-row align="center" class="mx-0">
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi suscipit pariatur numquam ipsum cum nostrum harum eveniet libero quidem error aperiam eum, nisi repellat rerum voluptatibus odio tenetur aliquam vero.
                </p>
            </v-row>
        </v-card-text>
    </v-card>
</template>

<script>
export default {
    data: () => ({
        loading: false,
        selection: 1
    }),

    methods: {
        reserve() {
            this.loading = true;

            setTimeout(() => (this.loading = false), 2000);
        }
    }
};
</script>
