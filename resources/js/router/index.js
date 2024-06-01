import { createMemoryHistory, createRouter } from 'vue-router'

import HomePage from '../pages/HomePage.vue';
import ResumePage from '../pages/ResumePage.vue';
import SkillsPage from '../pages/SkillsPage.vue';
import ContactPage from '../pages/ContactPage.vue';
import ProjectPage from '../pages/ProjectPage.vue';

const routes = [
  { path: '/',
    name: 'home', 
    component: HomePage
  },
  { path: '/curriculum', 
    name: 'curriculum',
    component: ResumePage,
  },
  { path: '/project', 
    name: 'project',
    component: ProjectPage,
  },
  { path: '/skills', 
    name: 'skills',
    component: SkillsPage,
  },
  { path: '/contact', 
    name: 'contact',
    component: ContactPage,
  },
]

const router = createRouter({
  history: createMemoryHistory(),
  routes,
})

export default router;