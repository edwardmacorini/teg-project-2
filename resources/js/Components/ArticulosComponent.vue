<template>
    <a :href="link" style="text-decoration: none;">
        <v-card :loading="loading" class="mx-auto my-12" max-width="300">
            <template slot="progress">
                <v-progress-linear
                    color="deep-purple"
                    height="10"
                    indeterminate
                ></v-progress-linear>
            </template>

            <v-img height="250" :src="url"></v-img>

            <v-card-title>{{ title }}</v-card-title>

            <v-card-text>
                <v-row align="center" class="mx-0">
                    <p>
                        {{ parr }}
                    </p>
                </v-row>
            </v-card-text>
        </v-card>
    </a>
</template>

<script>
export default {
    props: {
        title: String,
        parr: String,
        url: String,
        link: String
    },
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
