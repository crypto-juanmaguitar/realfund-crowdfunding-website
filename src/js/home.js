import jsrender from 'jsrender'
import web3 from './contracts/web3'
import './common'

import { getProjectsListInfo } from './utils/'
import { drawPie } from './utils/common'

import '../scss/home.scss'

console.log('Home!')

;(async function () {
  const [account] = await web3.eth.getAccounts()
  console.log(account)
  window.REALFUND.thisAccount = account
  const projects = await getProjectsListInfo()
  console.log(projects)

  const projectsListTmpl = jsrender.templates('#projectsListTmpl')
  const htmlListProjects = projectsListTmpl.render(projects)
  $('#list_projects_home').html(htmlListProjects)

  const highlightedProject = projects[0]
  const { address, title, image, promotor, city, description, goal, finalizesIn, percent, balanceInEther } = highlightedProject

  $('.rfnd-highlighted-project-link').attr('href', `project.html?address=${address}`)
  $('.rfnd-highlighted-project-image').attr('src', image)
  $('.rfnd-highlighted-project-title').html(title)
  $('.rfnd-highlighted-project-promotor').html(promotor)
  $('.rfnd-highlighted-project-city').html(city)

  $('.rfnd-highlighted-project-percent').attr('data-percent', percent)
  $('.rfnd-highlighted-project-time').html(finalizesIn)
  $('.rfnd-highlighted-project-funded').html(`${balanceInEther} ETH`)

  drawPie()

  $('#pluswrap').addClass('hidden')

})()

