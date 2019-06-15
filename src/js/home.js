// We import our the scripts for the smart contract instantiation, and web3
import crowdfundingInstance from './contracts/crowdfunding';
import projectInstance from './contracts/project';
import web3 from './contracts/web3';

const getProjectsListInfo = async () => {
  const projectsAddresses = await crowdfundingInstance.methods
    .getProjects()
    .call();
  console.log({projectsAddresses})
  projectsAddresses.forEach(async projectAddress => {
    const projectContract = crowdfundingInstance(projectAddress);
    const projectInfo = await projectInstance.methods.getDetails().call();
    projectInfo.isLoading = false;
    projectInfo.contract = projectContract;
    console.log(projectInfo)
  });
};
// this code snippet takes the account (wallet) that is currently active
web3.eth.getAccounts().then(accounts => {
  console.log(accounts)
  // [this.account] = accounts;
  getProjectsListInfo();
});

// import 'bootstrap';

// import '../scss/index.scss';

console.log('jQuery works!');

// Your jQuery code
