import web3 from './contracts/web3'
import jsrender from 'jsrender'
import { getProjectsListInfo, startProject } from './utils/'
import './common'

import '../scss/admin.scss'

web3.eth
  .getAccounts()
  .then(([account]) => {
    console.log(account)
    window.REALFUND.thisAccount = account
    return getProjectsListInfo()
  })
  .then(projectsList => {
    console.log({ projectsList })

    const projectTmpl = jsrender.templates('#projectTmpl')
    const htmlListProjects = projectTmpl.render(projectsList)
    $('#list-projects').html(htmlListProjects)
  })

$('#create-new-project').on('submit', function (e) {
  e.preventDefault()
  const projectName = $('#projectName').val()
  const projectDescription = $('#projectDescription').val()
  const projectDuration = $('#projectDuration').val()
  const projectGoal = $('#projectGoal').val()
  console.log({
    projectName,
    projectDescription,
    projectDuration,
    projectGoal
  })

  startProject({
    title: projectName,
    description: projectDescription,
    duration: projectDuration,
    amountGoal: projectGoal
  })
})
