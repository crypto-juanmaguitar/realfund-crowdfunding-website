import web3 from './contracts/web3'
import moment from 'moment'
import jsrender from 'jsrender'
import { getProjectsListInfo, startProject } from './utils/'
import './common'

import '../scss/admin.scss'

getProjectsListInfo()
  .then(projectsList => {
    const projectsListTime = projectsList.map(project => {
      project.dueTime = moment.unix(project.finishesAt).fromNow()
      return project
    })
    const projectTmpl = jsrender.templates('#projectTmpl')
    const htmlListProjects = projectTmpl.render(projectsListTime)
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
