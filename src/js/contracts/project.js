/* eslint-disable */
import web3 from './web3';

import { abi } from 'realfund-smart-contracts/build/contracts/Project.json';

export default address => {
  const instance = new web3.eth.Contract(abi, address);
  return instance;
};
