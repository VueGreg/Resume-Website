import { createWebHistory , createRouter } from 'vue-router'

import HomePage from '../pages/HomePage.vue';
import ResumePage from '../pages/ResumePage.vue';
import SkillsPage from '../pages/SkillsPage.vue';
import ContactPage from '../pages/ContactPage.vue';
import ProjectPage from '../pages/ProjectPage.vue';
import ConnexionPage from '../pages/connexionPage.vue';
import ExperiencePage from '../pages/ExperiencePage.vue';
import LegalPage from '../pages/LegalPage.vue';

const routes = [
  { path: '/',
    name: 'home', 
    component: HomePage
  },
  { path: '/curriculum', 
    name: 'curriculum',
    component: ResumePage,
  },
  { path: '/projets', 
    name: 'project',
    component: ProjectPage,
  },
  { path: '/competences', 
    name: 'skills',
    component: SkillsPage,
    props: true,
  },
  { path: '/contact', 
    name: 'contact',
    component: ContactPage,
  },
  { path: '/connection', 
    name: 'connexion',
    component: ConnexionPage,
  },
  { path: '/experience/:slug', 
    name: 'experience',
    component: ExperiencePage,
    props: true,
  },
  { path: '/legal', 
    name: 'legal',
    component: LegalPage,
  },
]

const router = createRouter({
  history: createWebHistory (),
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition
    } else {
      return { top: 0 }
    }
  },
})

export default router;