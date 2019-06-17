/* eslint-disable */
import web3 from './web3';
import {abi} from 'realfund-smart-contracts/build/contracts/Crowdfunding.json'

const address = '0xA51eec858367065b1C3B41839362050E5f409540'; // Your deployed contract's address goes here

const instance = new web3.eth.Contract(abi, address);

export default instance;
