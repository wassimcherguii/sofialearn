import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
import App from './App.jsx'
import { Theme, ThemePanel } from '@radix-ui/themes';
import '@radix-ui/themes/styles.css';

createRoot(document.getElementById('root')).render(
  <Theme accentColor="crimson" grayColor="sand" radius="large" scaling="95%">
    <StrictMode>
      <App />
      <ThemePanel />
    </StrictMode>
  </Theme>
)
