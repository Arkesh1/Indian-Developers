// Always close the code, cause you can make conflicts (same for css use prefixes)
(function () {

  let projects = []
  let active = {
    name: null,
    trigger: null,
    element: null
  }
  let activeState = null
  let projectChangeInterval = null
  let carouselElement = null
  let showNextProjectAfterMs = 10000
  let isInstalling = false

  // Front
  const initializeProjects = () => {
    const triggers = document.querySelectorAll('.ci-project-list-element')
    const elements = document.querySelectorAll('.ci-project')
    projects = Array.from(triggers).map((i, index) => ({
      trigger: i,
      element: elements[index],
      name: i.id.replace('-trigger', '')
    }))
  }
  const isInViewport = el => {
    const rect = el.getBoundingClientRect()
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    )
  }
  const hoverOnProjectTrigger = i => {
    if (i.classList.contains('ci-selected-project')) {
      disableAutomaticProjectChange()
    } else {
      selectProject(i)
    }
  }
  const selectProject = i => {
    disableAutomaticProjectChange()
    showProject(i)
    automaticProjectChange()
  }
  const showProject = i => {
    if (active.name) {
      document.querySelector('.ci-project-content').classList.remove(`ci-${active.name}-visible`)
    }
    active.name = i.id.replace('-trigger', '')
    document.querySelector('.ci-project-content').classList.add(`ci-${active.name}-visible`)
    if (active.trigger) {
      active.trigger.classList.remove('ci-selected-project')
    }
    active.trigger = i
    active.trigger.classList.add('ci-selected-project')
    active.element = document.querySelector(`.ci-project-${active.name}`)
  }
  const automaticProjectChange = () => {
    if (!projectChangeInterval) {
      projectChangeInterval = setInterval(() => {
        const activeIndex = projects.findIndex(i => i.name === active.name)
        const nextIndex = activeIndex === projects.length - 1 ? 0 : activeIndex + 1
        showProject(projects[nextIndex].trigger)
      }, showNextProjectAfterMs)
    }
  }
  const disableAutomaticProjectChange = () => {
    clearInterval(projectChangeInterval)
    projectChangeInterval = null
  }
  const isCarouselVisible = () => {
    const inViewport = isInViewport(carouselElement)
    if (!projectChangeInterval && inViewport) {
      automaticProjectChange()
    } else if (projectChangeInterval && !inViewport) {
      disableAutomaticProjectChange()
    }
  }

  // Backend communication setup
  const handleInstallClick = (e) => {
    const el = e.target;
    const slug = el.dataset.slug;
    const prev = el.innerText;

    if (isInstalling === true) return;
    isInstalling = true;

    el.innerText = 'Installing, please wait...';
    el.classList.add('ci-inisev-prepare');

    clearInterval(projectChangeInterval);
    setTimeout(() => {
      el.classList.add('ci-inisev-install');
      let xhr = new XMLHttpRequest();
          xhr.open('POST', ajaxurl, true);
          xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
          xhr.onload = () => {
            automaticProjectChange();
            if (xhr.status === 200 || xhr.status < 400) {
              try {
                let res = xhr.responseText;
                if (isJsonString(res)) res = jsonParse(res);
                if (typeof res.success != 'undefined' && res.success === true) {
                  el.classList.remove('ci-inisev-install');
                  el.innerText = 'Plugin installed successfully :)'
                  setTimeout(() => { window.location.reload(); }, 1000);
                } else installationFailed(el, prev);
              } catch (e) { installationFailed(el, prev); }
            } else installationFailed(el, prev);
          }
          xhr.send('action=inisev_installation&slug=' + slug);
    }, 7000);
  }
  const installationFailed = (el, prev) => {
    el.innerText = 'Installation failed...';
    setTimeout(() => {
      el.classList.remove('ci-inisev-install');
      setTimeout(() => {
        el.classList.remove('ci-inisev-prepare');
        el.innerText = prev;
        isInstalling = false;
      });
    }, 2000);
  }
  const applyEventListenerForInstall = (btn) => {
    if (btn) btn.addEventListener('click', handleInstallClick);
  }
  const makeButtonsInteractive = () => {
    const btns = document.getElementsByClassName('ci-inisev-install-plugin');
    for (let i = 0; i < btns.length; ++i) {
      applyEventListenerForInstall(btns[i]);
    }
  }
  const isJsonString = (str) => {
    try { JSON.parse(str); }
    catch (e) {
      if (typeof str === 'string') {
        let reversed = reverseJsonString(str);
        let lastcorrect = reversed.indexOf('}');
        if (lastcorrect == 0) lastcorrect = str.length;
        else lastcorrect = -lastcorrect;

        str = str.slice(str.indexOf('{'), lastcorrect);

        try {
          JSON.parse(str);
        } catch (e) {
          return false;
        }
        return true;
      } else return false;
    }
    return true;
  }
  const reverseJsonString = (str) => {
    if (typeof str === 'string')
      return (str === '') ? '' : reverseJsonString(str.substr(1)) + str.charAt(0);
    else
      return str;
  }
  const jsonParse = (str) => {
    try { JSON.parse(str); }
    catch (e) {
      if (typeof str === 'string') {
        let reversed = reverseJsonString(str);
        let lastcorrect = reversed.indexOf('}');
        if (lastcorrect == 0) lastcorrect = str.length;
        else lastcorrect = -lastcorrect;
        str = str.slice(str.indexOf('{'), lastcorrect);
        try {
          JSON.parse(str);
        } catch (e) {
          return false;
        }
        return JSON.parse(str);
      } else return false;
    }
    return JSON.parse(str);
  }

  document.addEventListener("DOMContentLoaded", () => {
    initializeProjects();
    showProject(document.querySelector('#BackupMigration-trigger'));
    document.querySelectorAll('.ci-project-list-element').forEach(i => {
      i.addEventListener('mouseover', e => hoverOnProjectTrigger(i))
      i.addEventListener('mouseout', automaticProjectChange)
    });
    carouselElement = document.querySelector('.ci-carrinis .ci-carousel');
    document.addEventListener('scroll', isCarouselVisible);
    document.querySelectorAll('.ci-carrinis .ci-project').forEach(i => {
      i.addEventListener('mouseover', disableAutomaticProjectChange)
      i.addEventListener('mouseout', automaticProjectChange)
    });

    // Backend communication initialization
    makeButtonsInteractive();
  });

})();
