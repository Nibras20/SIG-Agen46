const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"api.agen.json":{"uri":"api\/agen\/json","methods":["GET","HEAD"]},"home":{"uri":"home","methods":["GET","HEAD"]},"list-agen46":{"uri":"list-agen46","methods":["GET","HEAD"]},"simple-map":{"uri":"simple-map","methods":["GET","HEAD"]},"simple-v2":{"uri":"simple-v2","methods":["GET","HEAD"]},"about":{"uri":"about","methods":["GET","HEAD"]},"testing":{"uri":"testing","methods":["GET","HEAD"]}}};
if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };
