import { createMemoryHistory, createRouter } from 'vue-router'

import HomePage from '../pages/HomePage.vue';
import SkillPage from '../pages/SkillPage.vue';

const routes = [
  { path: '/',
    name: 'home', 
    component: HomePage
  },
  { path: '/skills', 
    name: 'skill',
    component: SkillPage
  },
]

const router = createRouter({
  history: createMemoryHistory(),
  routes,
})

export default router;