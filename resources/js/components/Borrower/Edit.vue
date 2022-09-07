<template>
    <div>
        <h3 class="text-center">Edit Borrower</h3>
        <div class="row">
            <div class="col-md-6">
                <div v-for="(errArray, index) in validate" :key="index" class="mb-2">
                    <p class="mb-0 text-danger">{{ errArray }} </p>
                </div>
                <form @submit.prevent="updateBorrower">
                    <div class="form-group">
                        <label>Business Name</label>
                        <input type="text" class="form-control" v-model="borrower.legal_business_name">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" v-model="borrower.business_physical_address">
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" v-model="borrower.business_physical_city">
                    </div>
                    <div class="form-group">
                        <label>Province</label>
                        <input type="text" class="form-control" v-model="borrower.business_physical_province">
                    </div>
                    <div class="form-group">
                        <label>Postal Code</label>
                        <input type="text" class="form-control" v-model="borrower.business_physical_postal">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="borrower.email">
                    </div>
                    <div class="form-group">
                        <label>Monthly Sales</label>
                        <input type="text" class="form-control" v-model="borrower.monthly_sales">
                    </div>
                    <div class="form-group">
                        <label>Monthly Expenses</label>
                        <input type="text" class="form-control" v-model="borrower.monthly_expenses">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="borrower.other_financing">
                            <label class="form-check-label" for="gridCheck">
                                Other Financing
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Other Financing Amount</label>
                        <input type="text" class="form-control" v-model="borrower.other_financing_amount">
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control" v-model="borrower.dob">
                    </div>
                    <div class="form-group">
                        <label>Step</label>
                        <input type="text" class="form-control" v-model="borrower.step">
                    </div>
                    <div class="form-group">
                        <label>Steps Array</label>
                        <li v-for="step in steps" :value="step">{{ step }}</li>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            borrower: {},
            steps: {},
            validate: ''
        }
    },
    created() {
        this.axios
            .get(`https://project-exercise.test/api/borrowers/${this.$route.params.id}`)
            .then((res) => {
                this.borrower = res.data;
                this.steps = JSON.parse(res.data.steps);
            });
    },
    methods: {
        updateBorrower() {
            this.axios
                .patch(`https://project-exercise.test/api/borrowers/${this.$route.params.id}`, this.borrower)
                .then((res) => {
                    this.$router.push({name: 'home'});
                })
                .catch(err => {
                    this.validate = err.response.data.errors
                })
                .finally(() => this.loading = false);
        }
    }
}
</script>
