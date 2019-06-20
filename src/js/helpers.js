export const handleError = method => e => {
  console.log(`${'-'.repeat(20)}> ERROR in method ${method} <${'-'.repeat(20)}`)
  console.log(e)
  console.log('---')
}

export const updateInterface = () => { window.location.reload() }
