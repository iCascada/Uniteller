import {ref} from 'vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

export default {
    components: {
        Dropdown,
        DropdownLink,
        NavLink,
        ResponsiveNavLink,
    },
    setup: function() {
        const showingNavigationDropdown = ref(false);

        return {
            showingNavigationDropdown
        }
    },
}
