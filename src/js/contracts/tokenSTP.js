/* eslint-disable */
import web3 from './web3';
import {abi} from 'realfund-smart-contracts/build/contracts/TokenSTP.json'

const addressesDeploy = ['0xa01E1affefef38f1B8dEF495a26e67642ba9Ac83', '0x02aaFE4adE4460a7a0d1161157c46162FA49dC0B', '0x313F741c4DF5414372236a12C75dcB02b077a69E', '0x28DAE1Ab0113B66254285fB37588A9B059AC6F96']
const [address] = addressesDeploy

const instance = new web3.eth.Contract(abi, address);

export default instance;
