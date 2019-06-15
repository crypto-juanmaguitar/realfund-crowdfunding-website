// We import our the scripts for the smart contract instantiation, and web3
import crowdfundingInstance from '../contracts/crowdfunding'
import crowdfundingProject from '../contracts/project'
import web3 from '../contracts/web3'

const DAY = 3600 * 24

export const getProjectsDetails = async projectAddress => {
  const projectInstance = crowdfundingProject(projectAddress)
  console.log(projectInstance)
  console.log(projectInstance.methods)

  const title = await projectInstance.methods.title().call()
  const description = await projectInstance.methods.description().call()
  const goal = await projectInstance.methods.goal().call()
  const finishesAt = await projectInstance.methods.finishesAt().call()

  const goalInEther = web3.utils.fromWei(goal.toString())
  const finishesAtInDays = finishesAt.toString()

  return { title, description, goal: goalInEther, finishesAt: finishesAtInDays }
}

export const getProjectsListInfo = async () => {
  const projectsAddresses = await crowdfundingInstance.methods
    .getProjects()
    .call()

  return Promise.all(projectsAddresses.map(getProjectsDetails))
}

export const startProject = async ({
  title,
  description,
  duration,
  amountGoal
}) => {
  console.log('startProject')
  console.log({
    title,
    description,
    duration,
    amountGoal,
    address: window.REALFUND.thisAccount
  })
  const durationInSeconds = duration * DAY
  const newProject = await crowdfundingInstance.methods
    .startProject(
      title,
      description,
      durationInSeconds,
      web3.utils.toWei(amountGoal, 'ether')
    )
    .send({
      from: window.REALFUND.thisAccount
    })

  const projectInfo = newProject.events.ProjectStarted.returnValues
  console.log({ newProject, projectInfo })
}
