import AllBorrowers from './components/Borrower/All.vue';
import AddBorrower from './components/Borrower/Add.vue';
import EditBorrower from './components/Borrower/Edit.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllBorrowers
    },
    {
        name: 'add',
        path: '/add',
        component: AddBorrower
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditBorrower
    }
];
