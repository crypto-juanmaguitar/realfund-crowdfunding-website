// We import our the scripts for the smart contract instantiation, and web3
import crowdfundingInstance from '../contracts/crowdfunding'
import crowdfundingProject from '../contracts/project'
import web3 from '../contracts/web3'
import moment from 'moment'

import { projectsConfig } from '../config'

window.REALFUND = window.REALFUND || {}

const DAY = 3600 * 24

export const getProjectsDetails = async projectAddress => {
  const projectInstance = crowdfundingProject(projectAddress)

  const title = await projectInstance.methods.title().call()
  const description = await projectInstance.methods.description().call()
  const goal = await projectInstance.methods.goal().call()
  const finishesAt = await projectInstance.methods.finishesAt().call()

  const goalInEther = web3.utils.fromWei(goal.toString())
  const finishesAtInDays = finishesAt.toString()

  const balance = await web3.eth.getBalance(projectAddress)
  const balanceInEther = web3.utils.fromWei(balance.toString())

  const finalizesIn = moment.unix(finishesAt).fromNow()

  const percent = (goalInEther * balanceInEther) / 100

  return {
    address: projectAddress,
    title,
    description,
    goal: goalInEther,
    finishesAt: finishesAtInDays,
    balanceInEther,
    finalizesIn,
    percent,
    ...projectsConfig[projectAddress]
  }
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

export const fundProject = async ({ projectAddress, amount }) => {
  console.log({ projectAddress, amount })
  const projectInstance = crowdfundingProject(projectAddress)
  console.log(projectInstance.methods)
  console.log(window.REALFUND.thisAccount)
  const responseContribution = await projectInstance.methods.contribute().send({
    from: window.REALFUND.thisAccount,
    value: web3.utils.toWei(amount, 'ether')
  })

  console.log(responseContribution)

  // const newTotal = parseInt(
  //   responseContribution.events.FundingReceived.returnValues.currentTotal,
  //   10
  // )
  // const projectGoal = parseInt(this.projectData[index].goalAmount, 10)
  // this.projectData[index].currentAmount = newTotal
  // this.projectData[index].isLoading = false
  // // Set project state to success
  // if (newTotal >= projectGoal) {
  //   this.projectData[index].currentState = 2
  // }
}
