<template>
    <div>
        <h3 class="text-center">All Borrowers</h3><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>UUID</th>
                <th>Business Name</th>
                <th>Email</th>
                <th>Monthly Sales</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="borrower in borrowers" :key="borrower.id">
                <td>{{ borrower.id }}</td>
                <td>{{ borrower.legal_business_name }}</td>
                <td>{{ borrower.email }}</td>
                <td>{{ borrower.monthly_sales }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: borrower.id }}" class="btn btn-primary">Edit</router-link>
                        <button class="btn btn-danger" @click="deletePost(borrower.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            borrowers: []
        }
    },
    created() {
        this.axios
            .get('https://project-exercise.test/api/borrowers')
            .then(response => {
                this.borrowers = response.data;
            });
    },
    methods: {
        deletePost(id) {
            this.axios
                .delete(`https://project-exercise.test/api/borrowers/${id}`)
                .then(response => {
                    let i = this.borrowers.map(item => item.id).indexOf(id);
                    this.borrowers.splice(i, 1)
                });
        }
    }
}
</script>
